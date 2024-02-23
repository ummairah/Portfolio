public class Lampu {
    protected String on;
    protected String off;

    public Lampu() {
        System.out.println("Inside Lampu : Constructor");
        on =" ";
        off = " ";
    }
    public Lampu(String on, String off) {
        this.on = on; 
        this.off = off;
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
class LampuPijar extends Lampu {
    protected String nama;

    public LampuPijar() {
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
        LampuPijar lampu = new LampuPijar();

        lampu.setOn("Lampu Nyala");
        lampu.setOff("Lampu Padam");
        lampu.setNama("Mentol Lampu");

        System.out.println("Nama lampu\t:" + lampu.getNama());
        System.out.println("Turn On\t\t:" + lampu.getOn());
        System.out.println("Turn Off\t:" + lampu.getOff());
    }
}
