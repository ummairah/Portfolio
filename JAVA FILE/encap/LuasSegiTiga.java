package encap;

public class LuasSegiTiga {
    public static void main(String[] args) {
        Triangle pg = new Triangle();
        pg.setPanjang(10);
        pg.setLebar(20);

        System.out.println("Panjang :" + pg.getPanjang());
        System.out.println("Lebar : " + pg.getLebar());
        System.out.println("Luas :" + pg.getLuas());
    }
}