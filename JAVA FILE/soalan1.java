public class soalan1 {
    public static void main(String[] args) {
        try {
        int[] num = {5,4,6,7,8};
        System.out.println(num[6]);   

        }catch(Exception e) {
            System.out.println(e);
        }
        finally{
            System.out.println("Akhir Porgram");
        }
    } 
}
