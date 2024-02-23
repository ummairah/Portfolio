public class book3 { 
    String namaBuku;
    String namaPengarang;
    int pages;

    public book3() { //constructor 
        namaBuku = "Untukku";
        namaPengarang = "Ummairah";
        pages = 105;
    }

    void DisplayData() { //method displayData()
        System.out.println(namaBuku + " " + namaPengarang + " " + pages);
    }


    public static void main(String[]args) {
        book3 b1 = new book3();
        b1.DisplayData();
        book3 b2= new book3();
        b2.DisplayData();
    }
}
