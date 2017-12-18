import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable()
export class ProductoProvider {
  public url: string='http://localhost:8000/api/product/getProducts'

  constructor(public http: HttpClient) {
    console.log('Hello ProductoProvider Provider');
  }

  getProductos(){
    return this.http.get(this.url);
  }

}
