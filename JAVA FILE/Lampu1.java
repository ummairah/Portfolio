public class Lampu1 {
    protected String on;
    protected String off;

    public Lampu1() {
        System.out.println("Inside Lampu : Constructor");
        on =" ";
        off = " ";
    }
    public Lampu1(String on, String off) {
        System.out.println("Turn On: Constructor " + on);
        System.out.println("Turn Off : Constructor " + off);
    }

    public void setOn(String on) {
        this.on=on;
    }

    public void setOff (String off) {
        this.off=off;
    }

    public String getOn() {
        return on;
    }

    public String getOff() {
        return off;
    }
}
class LampuPijar extends Lampu1 {
    protected String nama;
    /* public LampuPijar() {
        System.out.println("Inside LampuPijar : Constructor")
    } */
    public LampuPijar() {
        super("Lampu Pecah","Mentol pecah");
        System.out.println("Inside LampuPijar : Constructor");
    }

    public void setNama(String nama) {
        this.nama=nama;
    }

    public String getNama() {
        return nama;
    }
}

class DemoLampu {
    public static void main(String[] args) {
        //instance lampu dari class LampuPijar
        LampuPijar lampu = new LampuPijar();
        // setvalue setiap method
        lampu.setOn("Lampu Nyala!");
        lampu.setOff("Lampu Padam!");
        lampu.setNama("Mentol Lampu");
        // menampilkan data
        System.out.println("Nama lampu\t:" + lampu.getNama());
        System.out.println("Turn On\t\t:" + lampu.getOn());
        System.out.println("Turn Off\t:" + lampu.getOff());
        }
    }
