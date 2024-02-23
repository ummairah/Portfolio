package polimorphism.soalan_3;

class Geometri{
    //variable 
    String Jenis;
    double width, height, radius;

    Geometri(double w, double h, double r){
        width = w;
        height = h;
        radius = r;
    }
    
    public void kiraluas(){
    }
}

class SegiEmpat extends Geometri{
    SegiEmpat(double w, double h){
        super(w,h,h);
    }
    
    public void kiraluas(){
        double luas = width*height;
        System.out.println("Luas Segi Empat Tepat ialah "+String.format("%.2f",luas));
        super.kiraluas();
   }
}

class SegiTiga extends Geometri{
    SegiTiga(double w, double h){
        super(w,h,h);
    }

    public void kiraluas(){
        double luas = width*height;
        System.out.println("Luas Segi Tiga ialah "+String.format("%.2f",luas));
        super.kiraluas();
   }
}

class Bulatan extends Geometri {
    Bulatan(double r){
        super(r,r,r);
}
public void kiraluas(){
    double luas = Math.PI *radius * radius;
    System.out.println("Luas Segi Tiga ialah "+String.format("%.2f",luas));
    super.kiraluas();
   }
}

public class metri {
public static void main(String[] args){

    Geometri obj = new SegiEmpat(5,5);
    obj.kiraluas();

    SegiTiga ok = new SegiTiga(4,5);
    ok.kiraluas();

    Bulatan gu = new Bulatan(2);
    gu.kiraluas();
}
}
