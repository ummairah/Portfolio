package soalan_1;

public class DemoBook {
    public static void main(String[] args) {
        Textbook tb = new Textbook("Sejarah");
        System.out.println("The title is " + tb.getTitle() + " number of pages is " + tb.getPages());
    }
}
