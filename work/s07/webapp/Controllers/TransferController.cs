using System;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using webapp.Services;

namespace webapp.Controllers
{
    public class TransferController : Controller
    {
        private readonly ILogger<TransferController> _logger;

        public TransferController(ILogger<TransferController> logger)
        {
            _logger = logger;
        }


        public IActionResult Transfer(IFormCollection collection)
        {

            string source = collection["source"];
            string destination = collection["destination"];
            string amount = collection["amount"];

            if (!string.IsNullOrEmpty(amount))
            {
                int amountInt = Int32.Parse(amount);

                if (AccountService.MakeTransfer(source, destination, amountInt)) 
                {
                    return View("Success");
                }
                else 
                {
                    return View("Unsuccess");
                }
               
            }

            return View();
        }
    }
}