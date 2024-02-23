public class ContohTryCatch2 {
    public static void main(String[] args) {
        try {
            int data=50;
            System.out.println("Hasil : " + data);

        }catch (Exception e) {
            System.out.println(e);
        }
        finally {
            System.out.println("Akhir program");
        }
    }
}
