namespace console
{
    public class Account
    {
        public string number { get; set; }
        public int balance { get; set; }
        public string label { get; set; }
        public string owner { get; set; }

        public Account(string number, int balance, string label, string owner) 
        {
            this.number = number;
            this.balance = balance;
            this.label = label;
            this.owner = owner;
        }
    }
}