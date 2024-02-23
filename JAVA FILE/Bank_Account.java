public class Bank_Account {
    String name_depo;
    float acc_number;
    String acc_type;
    float balance_acc;

    public Bank_Account() { //constructor 
        name_depo = "Khadijah";
        acc_number = 20554842;
        acc_type = "debit";
        balance_acc = 150000;
    }
    
    void displaydata() { // method bagi displaydata()
        System.out.println("Name :" +" " + name_depo);
        System.out.println("Balance in Account :" + " " +balance_acc);
    }

    public static void main(String[]args) {
        Bank_Account bank_acc = new Bank_Account();
        bank_acc.displaydata();
    }
}
