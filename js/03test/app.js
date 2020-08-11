//   let x= 9;
// console.log(typeof(x))
// if(typeof x=='undefined'){
//   console.log(`the number is`);
// }else{
//   console.log('not number ');
// }
// const name = 'Ahmad';
// const age = 16;
// const job = 'stade';


// if(age>0 && age<6){
//   console.log("you are child");
// }
// else if(age>=6 && age<=15){
//   console.log("you are middel");
// }
// else if (age>=16){
//   if(job=="work"){
//     console.log('you are working');
//   }
//   else if(job=="stade"){
//     console.log('you are stade');
//   }

// }


// else if(job =='work' && age>=16){
//   console.log('you are working');

// }
// else if(job =='stade' && age>=16){
//   console.log('you are stade');
// }


// const fruit = 'banana';

// switch (fruit){
//   case 'banana' : 
//   console.log("my not fevorit fruit");
//   break;
//   case 'Appel' :
//   console.log("my  fevorit fruit");
//   break;
//   default:
//   console.log("this is a fruit");
//   break;
// }

// let today=new Date();
// let day = today.getDay();
// // day = 5
// switch(day){
//   case 0 :
//   console.log('sanday');
//   break;
//    case 1 :
//   console.log('manday');
//   break;
//   case 2 :
//   console.log('tusday');
//   break;
//   case 3 :
//   console.log('wensday');
//   break;
//   case 4 :
//   console.log('thrsday');
//   break;
//   case 5 :
//   console.log('freday');
//   break;
//   default :
//   console.log('saterday');
//   break;
// }


// document.getElementById("test").innerHTML = "hoi";

const cars = ['volvo','pego','foerd'];
//  cars[1]= 'marcedis';

 let trs=cars.length-1;

document.getElementById('test').innerHTML =cars [1];

console.log(trs);


