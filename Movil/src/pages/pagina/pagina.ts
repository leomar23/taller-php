import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';

import { ProductoPage } from '../producto/producto';
import { PaginaService } from '../../services/pagina.service';
import { ProductoProvider } from '../../providers/producto/producto';

@IonicPage()
@Component({
  selector: 'page-pagina',
  templateUrl: 'pagina.html',
})
export class PaginaPage{
  productos: any[] = [];
  producto: any;
  email: string ='';

  constructor(public prodProvider: ProductoProvider,
              public navCtrl: NavController, 
              public navParams: NavParams) {
  }

  ngOnInit(): void {
  }

  ionViewDidLoad() {

    console.log('ionViewDidLoad PaginaPage');
    this.prodProvider.getProductos()
    .subscribe(
      (data) => { // Success
        this.productos = data[''];
        console.log(data);
      },
      (error) =>{
        console.error(error);
      }
    )
    
  }

  initializeProd() {
    //this.producto = this.prodService.getProductos();
    console.log(this.productos)
  }
  getProd(ev) {
    // Reset items back to all of the items
    this.initializeProd();

    // set val to the value of the ev target
    var val = ev.target.value;

    // if the value is an empty string don't filter the items
    if (val && val.trim() != '') {
      this.producto = this.producto.filter((item) => {
        return (item.toLowerCase().indexOf(val.toLowerCase()) > -1);
      })
    }
  }

 ViewProd(id){
  this.navCtrl.push(ProductoPage);

 }

}
