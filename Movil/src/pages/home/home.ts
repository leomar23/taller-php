import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { PaginaPage } from '../pagina/pagina';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  productos: any[]=[];

  constructor(public navCtrl: NavController) {

  }

  ionViewDidLoad(){
    
  }


}
