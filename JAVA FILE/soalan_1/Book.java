package soalan_1;

public class Book {
    String title;
    int pages;

    Book(String setTajuk) {
        title=setTajuk;
    }

    public String getTitle() {
        return title;
    }

    public void setPages(int newPages) {
        pages=newPages;
    }

    public int getPages() {
        return pages;
    }
}
