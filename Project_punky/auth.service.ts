import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private apiUrl = 'http://127.0.0.1:8000/api/login'; // L'URL de votre backend PHP

  constructor(private http: HttpClient) {}

  login(email: string, password: string): Observable<any> {
    const body = { username: email, password: password };

    return this.http.post<any>(this.apiUrl, body);
  }
}
