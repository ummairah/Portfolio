package encap;

public class Triangle {
    int panjang,lebar,luas;

    public void setPanjang(int newPanjang) {
        panjang=newPanjang;
    }

    public int getPanjang() {
        return panjang;
    }

    public void setLebar(int newLebar) {
        lebar=newLebar;
    }

    public int getLebar() {
        return lebar;
    }

    public void setLuas(int hasil) {
        luas=hasil;
    }

    public int getLuas() {
        luas=(int) (1.0/2.0*panjang*lebar);
        return luas;
    }
    
}
