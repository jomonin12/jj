import { Component } from '@angular/core';
import { AuthService } from 'src/app/service/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent {
  email: string = '';
  password: string = '';

  constructor(private authService: AuthService) {}

  login(): void {
    this.authService.login(this.email, this.password).subscribe(
      (response: any) => {
        if (response.success) {
          console.log(response.message);
        } else {
          console.error(response.message);
        }
      },
      (error) => {
        console.error(
          "Une erreur s'est produite lors de la connexion :",
          error
        );
      }
    );
  }
}
