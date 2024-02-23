public class useBook {
    public static void main(String[] args) {
        
        nonFiction obj1 = new nonFiction("Mars");
        Fiction obj2 = new Fiction("Armagedoon");

        System.out.println("The title is " + obj1.getTitle()+ " and the price is " + obj1.getPrice());
        System.out.println("The title is " + obj2.getTitle()+ " and the price is " + obj2.getPrice());

    }
}
