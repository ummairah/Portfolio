package packcube;

public class Sample {
    public void cube(int v) {
        double luas=Math.pow(v, 3);
        System.out.println("Area of Cube is :" + luas);
    }

    public static void main(String[] args) {
        Sample calc = new Sample();
        calc.cube(6);
    }
}
