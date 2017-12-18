import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { HttpModule } from '@angular/http';
import { HttpClientModule, HttpClient } from '@angular/common/http';

//import { Facebook } from '@ionic-native/facebook';


import { AngularFireModule } from 'angularfire2';
import { AngularFireAuthModule } from 'angularfire2/auth';

import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { PaginaService} from '../services/pagina.service';
import { PaginaPage} from '../pages/pagina/pagina';

import { LoginService} from '../services/login.service';
import { LoginPage} from '../pages/login/login';

import { ProductoPage} from '../pages/producto/producto';
import { ProductoService } from '../services/producto.service';

import { RegistrarPage } from '../pages/registrar/registrar';
import { ProductoProvider } from '../providers/producto/producto';
import { UserProvider } from '../providers/user/user';

//id: buycar-ed486
export const firebaseConfig = {
  apiKey: "buycar-ed486",
  authDomain: "your-domain-name.firebaseapp.com",
  databaseURL: "https://your-domain-name.firebaseio.com",
  storageBucket: "your-domain-name.appspot.com",
  messagingSenderId: '<your-messaging-sender-id>'
};

@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    ProductoPage
  ],
  imports: [
    BrowserModule,
    HttpModule,
    HttpClientModule,
    IonicModule.forRoot(MyApp),
    AngularFireModule.initializeApp(firebaseConfig),
    AngularFireAuthModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    ProductoPage
  ],
  providers: [
    LoginService,
    PaginaService,
    ProductoService,
    StatusBar,
    SplashScreen,
    //Facebook,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    ProductoProvider,
    UserProvider
  ]
})
export class AppModule {}
