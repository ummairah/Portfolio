public class Book {
    String title;
    double price;

    Book(String newtitle) {
        title=newtitle;
    }

    public String getTitle() {
        return title;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice (double newPrice) {
        price=newPrice;
    }
}