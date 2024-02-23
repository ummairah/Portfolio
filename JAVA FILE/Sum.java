//overloading in java
public class Sum {
    //Overload sum(). This sum tkaes two int parameters
    public int sum(int x, int y) {
        return (x+y);
    }
    //Overload sum(). This sum takes two double parameters
    public double sum(double x, double y) {
        return (x+y);
    }
    //Driver code
    public static void main(String[]args){
        Sum s = new Sum();
        System.out.println(s.sum(2,20));
        System.out.println(s.sum(30,10));
        System.out.println(s.sum(45, 20.5));
    }
}
