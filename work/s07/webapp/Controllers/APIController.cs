using System.Collections.Generic;
using System.Linq;
using Microsoft.AspNetCore.Mvc;
using Newtonsoft.Json;
using webapp.Models;
using webapp.Services;

namespace webapp.Controllers
{
    [ApiController]
    public class APIController : ControllerBase
    {
        [HttpGet("api/accounts")]
        public IActionResult GetAllAccounts()
        {
            return Ok(AccountService.ReadAccounts());
        }

        [HttpGet("api/accounts/{number}")]
        public IActionResult GetAccountByNumber(string number)
        {
            List<Account> accounts = AccountService.ReadAccounts();
            Account account = accounts.FirstOrDefault(a => a.Number == number);
            if (account != null)
            {
                return Ok(account);
            }

            return NotFound(new { Error = "Account " + number + " not found" });
        }

        [HttpPut("api/transfer/{sourceNumber}/{destinationNumber}/{amount}")]
        public IActionResult Transfer(string sourceNumber, string destinationNumber, int amount)
        {

            if (AccountService.MakeTransfer(sourceNumber, destinationNumber, amount))
            {
                return Ok();
            }

            return NotFound(new { Error = "Transfer not complete, check account numbers and balance" });
        }
    }
}