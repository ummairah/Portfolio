package polimorphism.soalan_3;
class Geometri{
    String jenis;
    double luas, panjang, lebar, tinggi, radius;
    public void kiraluas() {
        
    }
    
    public Geometri(String jenis){
        this.jenis = jenis;
    }

    public String toString(){
        return "Jenis: " + jenis + " || Luas: " + luas;
    }
}

class SegiEmpat extends Geometri{
    public SegiEmpat(double panjang, double lebar){
        super("Segi Empat");
        this.panjang = panjang; this.lebar = lebar;
    }
    public void kiraluas() {
        luas = panjang * lebar;
    }
    public String toString(){
        return super.toString() + " || Panjang: " + panjang + " || Lebar: " + lebar;
    }
}

class SegiTiga extends Geometri{
    public SegiTiga(double tinggi, double lebar){
        super("Segi Tiga");
        this.tinggi = tinggi; this.lebar = lebar;
    }
    public void kiraluas() {
        luas = 0.5 * tinggi * lebar;
    }
    public String toString(){
        return super.toString() + " || Tinggi: " + tinggi + " || Lebar: " + lebar;
    }
}

class Bulatan extends Geometri{
    public Bulatan(double radius){
        super("Bulatan");
        this.radius = radius;
    }
    public void kiraluas() {
        luas = Math.PI * Math.pow(radius, 2);
    }
    public String toString(){
        return "Jenis: " + jenis + " || Luas: " + String.format("%.2f", luas) + " || Radius: " + radius;
    }
}

public class sha {
    public static void main(String[] args) {
        SegiEmpat obj1 = new SegiEmpat(10, 20);
        obj1.kiraluas();
        System.out.println(obj1);

        SegiTiga obj2 = new SegiTiga(10, 20);
        obj2.kiraluas();
        System.out.println(obj2);

        Bulatan obj3 = new Bulatan(10);
        obj3.kiraluas();
        System.out.println(obj3);
}
}