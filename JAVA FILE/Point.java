public class Point {
    private double x;
    private double y;
     
    public Point (double x, double y) {
        this.x = x;
        this.y = y;
    }

    public void print() {
        System.out.println("(" + x + "," + y + ")");
    }

    //this goes your code
    public void scale() {
        System.out.println("("+x/2+","+y/2+")");
    }

    public static class Main{
        public static void main(String[] args) {
            Point p = new Point(8, 4);
            for (int i = 0; i < 5; i++) {
                p.print();
                p.scale();
            }
        }
    }
}
