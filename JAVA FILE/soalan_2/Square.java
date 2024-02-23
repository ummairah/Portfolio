package soalan_2;

public class Square {
    double height,width,surfaceArea;

    Square(double newheight, double newwidth ) {
        height=newheight;
        width=newwidth;
        computeSurfaceArea();
    }

    public double computeSurfaceArea() {
        surfaceArea=height*width;
        return surfaceArea;
    }
}
