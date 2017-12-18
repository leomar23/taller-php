import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { Observable } from 'rxjs/Observable';

import 'rxjs/add/operator/map';

@Injectable()
export class ProductoService {
   userName: string;
   loggedIn: boolean;
   url = 'http://localhost:8000/auth';

   constructor(private http: Http) {
      this.userName = '';
      this.loggedIn = false;
   }
   

}