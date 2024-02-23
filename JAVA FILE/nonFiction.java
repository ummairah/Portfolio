public class nonFiction extends Book{
    
    public nonFiction(String nonfiction) {
        super(nonfiction);
        setPrice();
    }
    public void setPrice() {
        super.price=24.99;
    }
}