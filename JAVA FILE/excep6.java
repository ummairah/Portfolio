public class excep6 {
    public static void main(String[]args) {
    try {
        int a=0, b=5, c=0;
        c=b/a;
    }
    catch(ArithmeticException e) {
        System.out.println(e);
    }
    finally {
        System.out.println("I am from finally block");
    }
 }
}
