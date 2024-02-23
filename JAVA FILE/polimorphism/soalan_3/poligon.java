package polimorphism.soalan_3;

class geometri {
    String Jenis;
    public void kiraluas() {
        System.out.println("Ini adalah geometri");
    }
}

    class SegiEmpat extends geometri {
        public void kiraluas(int width, int length) {
            Jenis = "Segi Empat";
            int luas= width*length;
            System.out.println(Jenis +": "+luas);
        }
    }

    class SegiTiga extends geometri {
        public void kiraluas(Double formula, int panjang, int tinggi) {
            Jenis = "Segi Tiga";
            double luas = formula*panjang*tinggi;
            System.out.println(Jenis +": "+luas);        
    }
}

    class Bulatan extends geometri {
        public void kiraluas(int j) {
            Jenis = "Bulatan";
            int luas = (int) (Math.PI*Math.pow(j, 2));
            System.out.println(Jenis+": "+luas);
    }
}

public class poligon {
    public static void main(String[] args) {

        geometri gm = new geometri();
        gm.kiraluas();;
        
        SegiEmpat se = new SegiEmpat() ;
        se.kiraluas(5,2);

        SegiTiga st = new SegiTiga();
        st.kiraluas (1.0/2.0,5,8);

        Bulatan bl = new Bulatan();
        bl.kiraluas(5);

    }
}
