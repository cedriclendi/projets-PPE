import java.util.Scanner;


class temperature {
	public static void main(String[] args) {
	
			Scanner sc= new Scanner(System.in);
		 	double toConvert, converted = 0;
			char answer=' ', mode=' ';

			System.out.println("CONVERTISSEUR DE DEGREE CELSIUS ET DEGREE FAHRENHEIT");
			System.out.println("-----------------------------------------------------");
			
			do { //when answer is different to zero //principal loop
				do {//when answer is not equal to zero or one
					System.out.println("choisissez le mode de conversion");
					System.out.println("1 - Celsius - fahrenheit ");
					System.out.println("2 - Fahrenheit - celsius ");
					mode = sc.nextLine().charAt(0);
					if(mode != '1' && mode != '2')
						System.out.println("Mode inconnu, veuillez réitérer votre choix."); 
				}while(mode!='1' && mode!='2');
			 
				//input the number
				System.out.println("Température à convertir: ");
				toConvert = sc.nextDouble();
				sc.nextLine();
				
				//we change the operation depending the input
				if(mode=='1') {
					converted = ((9.0/5.0) * toConvert) + 32.0;
					System.out.print(toConvert + "°C est égale a : ");
					System.out.println(arrondi(converted, 2) + "°F");
				}
				else{
					 converted = ((toConvert - 32) * 5) / 9;
					 System.out.print(toConvert + " °F correspond à : ");
					 System.out.println(arrondi(converted, 2) + " °C.");
				}
				
				//we invite the user to quit or to stay
				 do{
					 System.out.println("Souhaitez-vous convertir une autre température ?(O/N)");
					 answer = sc.nextLine().charAt(0); 
					 }while(answer != 'O' && answer != 'N'); 
				 while(answer == 'O');
				 
    			}while(answer == 'O'); 
				 	System.out.println("Au revoir !"); 
				 	
				//End of the program								 
	}
	
	 
	public static double arrondi(double A, int B) {
		 return (double) ( (int) (A * Math.pow(10, B) + .5)) / Math.pow(10, B);
		 }

}

