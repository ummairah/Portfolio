public class Fiction extends Book{
    
    public Fiction(String fiction) {
        super(fiction);
        setPrice();
    }
    public void setPrice() {
        super.price=24.99;
    }
}