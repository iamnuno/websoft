using System;
using System.Collections.Generic;
using System.IO;
using ConsoleTables;
using Newtonsoft.Json;

namespace console
{
    public class AccountHelper
    {
        public List<Account> accounts { get; set; }
        public List<Account> accountsFound { get; set; }

        public AccountHelper()
        {
            accounts = LoadAccounts();
            accountsFound = new List<Account>();
        }

        public List<Account> LoadAccounts()
        {
            try
            {
                using StreamReader r = new StreamReader("../data/account.json");
                string json = r.ReadToEnd();
                return JsonConvert.DeserializeObject<List<Account>>(json);
            }
            catch (Exception e)
            {
                Console.WriteLine($"Could not read json file.\n{e}");
                return null;
            }
        }

        ///<param name="onlyByID">  
        /// Default set to true 
        /// If set to false, label and owner are also used to find accounts 
        ///</param>  
        public void FindAccount(string search, bool onlyById = true)
        {
            foreach (var account in accounts)
            {
                if (account.number == search)
                {
                    accountsFound.Add(account);
                }

                if (!onlyById)
                {
                    if (account.label.ToLower().Contains(search.ToLower()) || account.owner.ToLower() == search.ToLower())
                    {
                        if (!IsDuplicate(account))
                        {
                            accountsFound.Add(account);
                        }
                    }
                }
            }
        }

        ///<summary>  
        /// Checks for duplicates in case number and label or owner are the same. 
        /// Example: if one account number is 42 and owner is 42, avoid same account added twice to accountFound list
        ///</summary> 
        private bool IsDuplicate(Account account)
        {
            foreach (var item in accountsFound)
            {
                if (account.number == item.number)
                {
                    return true;
                }
            }
            return false;
        }

        public void ProcessTransfer(int amount)
        {
            if (accountsFound.Count == 2)
            {
                if (amount <= accountsFound[0].balance)
                {
                    accountsFound[0].balance -= amount;
                    accountsFound[1].balance += amount;

                    foreach (Account item in accountsFound)
                    {
                        foreach (Account account in accounts)
                        {
                            if (item.number == account.number)
                            {
                                account.balance = item.balance;
                            }
                        }
                    }
                    Console.WriteLine("\nTransfer complete.\n");
                    UpdateJsonFile();
                }
                else
                {
                    Console.WriteLine("\nNot enough balance to complete the transfer.\n");
                }
            }
            else
            {
                Console.WriteLine("\nAccount(s) not found.\n");
            }
            ClearFoundAccounts();
        }

        public void AddAccount(Account account)
        {
            FindAccount(account.number);
            if (accountsFound.Count == 0)
            {
                accounts.Add(account);
                ClearFoundAccounts();
                UpdateJsonFile();
                LoadAccounts();
                Console.WriteLine("\nAccount created.\n");
            }
            else
            {
                Console.WriteLine("\nAccount number already exists.\n");
            }
        }

        public void ClearFoundAccounts()
        {
            accountsFound.Clear();
        }

        public void PrintAccountsTable(List<Account> list)
        {
            if (list.Count != 0)
            {
                ConsoleTable table = new ConsoleTable("Number", "Balance", "Label", "Owner");
                foreach (var item in list)
                {
                    table.AddRow(item.number, item.balance, item.label, item.owner);
                }
                table.Write(Format.Alternative);
                accountsFound.Clear();
            }
            else
            {
                Console.WriteLine("No accounts found.\n");
            }
        }

        public void UpdateJsonFile()
        {
            string json = JsonConvert.SerializeObject(accounts, Formatting.Indented);
            File.WriteAllText("../data/account.json", json);
        }
    }
}