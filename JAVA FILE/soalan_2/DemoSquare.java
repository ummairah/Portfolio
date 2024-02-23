package soalan_2;

public class DemoSquare {
    public static void main(String[] args) {
        Square sq = new Square(8,6);
        Cube cb = new Cube(4);

        System.out.println("Area of square " + sq.computeSurfaceArea());
        System.out.println("Area of Cube is " + cb.computeSurfaceArea());
    }
}
