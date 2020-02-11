using System;
using System.Collections.Generic;
using System.IO;
using ConsoleTables;
using Newtonsoft.Json;

namespace console
{
    class Program
    {
        private AccountHelper accountHelper;

        static void Main(string[] args)
        {
            Program myApp = new Program();
            myApp.accountHelper = new AccountHelper();

            if (myApp.accountHelper.accounts.Count > 0)
            {
                Console.WriteLine("");
                myApp.printMenu();
            }
        }

        void printMenu()
        {
            bool menu = true;
            do
            {
                Console.WriteLine("-------- Bank Menu ---------");
                Console.WriteLine("");
                Console.WriteLine(" [1] View accounts");
                Console.WriteLine(" [2] View account by number");
                Console.WriteLine(" [3] Search");
                Console.WriteLine(" [4] Transfer");
                Console.WriteLine(" [5] Add account");
                Console.WriteLine(" [6] Exit");
                Console.WriteLine("");
                Console.WriteLine("----------------------------");
                Console.WriteLine("");
                Console.Write("> ");

                string option = Console.ReadLine().Trim();

                switch (option)
                {
                    case "1":
                        ViewAccountsOption();
                        break;
                    case "2":
                        ViewAccountByNumberOption();
                        break;
                    case "3":
                        SearchOption();
                        break;
                    case "4":
                        TransferOption();
                        break;
                    case "5":
                        AddAccountOption();
                        break;
                    case "6":
                        Console.WriteLine("\nBye.\n");
                        menu = false;
                        break;
                    default:
                        Console.WriteLine("\nInvalid option.\n");
                        break;
                }
            }
            while (menu);
        }

        void ViewAccountsOption()
        {
            Console.WriteLine("");
            accountHelper.PrintAccountsTable(accountHelper.accounts);
        }

        void ViewAccountByNumberOption()
        {
            Console.Write("\nAccount number > ");
            string number = Console.ReadLine().Trim();
            Console.WriteLine("");
            accountHelper.FindAccount(number);
            accountHelper.PrintAccountsTable(accountHelper.accountsFound);
        }

        void SearchOption()
        {
            Console.Write("\nSearch term > ");
            string search = Console.ReadLine().Trim();
            Console.WriteLine("");
            accountHelper.FindAccount(search, false);
            accountHelper.PrintAccountsTable(accountHelper.accountsFound);
        }

        void TransferOption()
        {
            Console.Write("\nEnter source account number > ");
            string source = Console.ReadLine().Trim();
            accountHelper.FindAccount(source);

            Console.Write("Enter destination account number > ");
            string destination = Console.ReadLine().Trim();
            accountHelper.FindAccount(destination);

            int amount = -1;
            bool isAmountValid = false;
            while (!isAmountValid)
            {
                try
                {
                    Console.Write("Enter amount > ");
                    amount = int.Parse(Console.ReadLine().Trim());
                    accountHelper.ProcessTransfer(amount);
                    isAmountValid = true;
                }
                catch (FormatException)
                {
                    Console.WriteLine("\nIncorrect format (must be an integer).\n");
                }
            }
        }

        void AddAccountOption()
        {
            Console.Write("\nEnter number > ");
            string number = Console.ReadLine().Trim();

            int balance = -1;
            bool isBalanceValid = false;
            while (!isBalanceValid)
            {
                try
                {
                    Console.Write("Enter balance > ");
                    balance = int.Parse(Console.ReadLine().Trim());
                    isBalanceValid = true;
                }
                catch (FormatException)
                {
                    Console.WriteLine("\nIncorrect format (must be an integer).\n");
                }
            }

            Console.Write("Enter label > ");
            string label = Console.ReadLine().Trim();

            Console.Write("Enter owner > ");
            string owner = Console.ReadLine().Trim();

            accountHelper.AddAccount(new Account(number, balance, label, owner));
        }
    }
}