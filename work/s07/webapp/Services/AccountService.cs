using System.Collections.Generic;
using System.IO;
using System.Linq;
using Microsoft.AspNetCore.Hosting;
using Newtonsoft.Json;
using webapp.Models;

namespace webapp.Services
{
    public class AccountService
    {
        private static readonly string _filePath = "../data/account.json";

        public static List<Account> ReadAccounts()
        {
            using StreamReader r = new StreamReader(_filePath);
            string json = r.ReadToEnd();
            return JsonConvert.DeserializeObject<List<Account>>(json);
        }

        public static void SaveAccounts(List<Account> accounts)
        {
            using StreamWriter file = File.CreateText(_filePath);
            JsonSerializer serializer = new JsonSerializer();
            serializer.Serialize(file, accounts);
        }

        public static bool MakeTransfer(string source, string dest, int amount)
        {
            List<Account> accounts = ReadAccounts();
            Account sourceAccount = accounts.FirstOrDefault(a => a.Number == source);
            Account destAccount = accounts.FirstOrDefault(a => a.Number == dest);

            if (sourceAccount != null && destAccount != null && sourceAccount.Balance >= amount)
            {
                sourceAccount.Balance -= amount;
                destAccount.Balance += amount;
                SaveAccounts(accounts);
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}