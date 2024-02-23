package encap.soalan_2;

class clinic {
    private String patient;
    private String medicine;
    private double price;

    public void setPatient(String newPatient) {
        patient=newPatient;
    }

    public String getPatient() {
        return patient;
    }

    public void setMedicine(String ubat) {
        medicine=ubat;
    }

    public String getMedicine() {
        return medicine;
    }

    public void setPrice(double newPrice) {
        price=newPrice;
    }

    public String getPrice() {
        return String.format("%.2f", price);
    }

}
public class TestClinic {
    public static void main(String[] args) {
        clinic p=new clinic();
        p.setPatient("Khadijah");
        p.setMedicine("Ubat Selesema");
        p.setPrice(5.40);

        System.out.println("Nama Pesakit : " + p.getPatient());
        System.out.println("Ubat diberi : " + p.getMedicine());
        System.out.println("Harga Ubat : " + p.getPrice());
    }
}
