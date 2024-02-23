package soalan_1;

public class Textbook extends Book{

    Textbook(String textbook) {
        super(textbook);
        setPages();
    }

    public void setPages() {
        super.pages=245;
    }
}
