package encap.soalan_3;

class LaundryEquipment {
    private String company;
    private double harga,jumlah;
    private int id_barang,bil_barang;
    
    public void setCompany(String syarikat) {
        company = syarikat;
    }

    public String getCompany() {
        return company;
    }

    public void setId(int id_barangan) {
        id_barang=id_barangan;
    }

    public int getId() {
        return id_barang;
    }

    public void setBil(int bilangan) {
        bil_barang=bilangan;
    }

    public int getBil() {
        return Math.round(bil_barang);
    }

    public void setHarga(double price) {
        harga=price;
    }

    public String getHarga(){
        return String.format("%.2f",harga);
    }

    public void setTotal(double total) {
        jumlah=total;
    }
    
    public String getTotal() {
        jumlah = bil_barang*harga;
        return String.format("%.2f",jumlah);    
    }
}
public class WashingName {
    public static void main(String[] args) {
        LaundryEquipment wn = new LaundryEquipment();
        wn.setCompany("Marliana Laundry Sdn Bhd");
        wn.setId(1023);
        wn.setBil(3);
        wn.setHarga(1255.60);

        System.out.println("Nama Syarikat : " + wn.getCompany());
        System.out.println("Kod ID Barang : " + wn.getId());
        System.out.println("Bilangan Barang : " + wn.getBil());
        System.out.println("Harga Seunit : " + wn.getHarga());
        System.out.println("Jumlah harga : " + wn.getTotal());
    }
}
