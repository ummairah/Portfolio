package soalan_2;

public class Cube extends Square {
    double depth;

    Cube(double surfaceArea) {
        super(surfaceArea, surfaceArea);
        depth=surfaceArea;
        computeSurfaceArea();
    }

    public double computesurfaceArea() {
        double hasil = 6*Math.pow(depth,2);
        return hasil;
    }
}
