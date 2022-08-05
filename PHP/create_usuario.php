<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossoringin="anonymus">
        </script>
        <link rel="stylesheet" href="../css/style_menu.css">
        <link rel="stylesheet" href="../css/style-bootstrap.css">
    </head>
    <body>
    <div class="modal" tabindex="-1" role="dialog" [ngStyle]="{'display':displayStyleCreate}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear cliente</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Cédula:</label>
                                <input ng-pattern="^(([0][1-9])|([1][0-9])|([2][0-4]))([0-9]{8})" type="text"
                                    name="cedula" class="form-control" [(ngModel)]="createClienteData.cedula">
                                <div *ngIf="errors.cedula">
                                    <p style="color: red;font-size: 12px;">{{errors.cedula}}</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control"
                                    [(ngModel)]="createClienteData.nombre">
                                <div *ngIf="errors.nombre">
                                    <p style="color: red;font-size: 12px;">{{errors.nombre}}</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" class="form-control"
                                    [(ngModel)]="createClienteData.fecha_nacimiento">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_cliente" class="col-form-label">Tipo de cliente</label>
                                <select class="form-control" [(ngModel)]="createClienteData.tipo_cliente">
                                    <option value="contado">Contado</option>
                                    <option value="credito">Crédito</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <textarea name="direccion" class="form-control"
                                    [(ngModel)]="createClienteData.direccion"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="text" name="telefono" class="form-control"
                                    [(ngModel)]="createClienteData.telefono">
                                <div *ngIf="errors.telefono">
                                    <p style="color: red;font-size: 12px;">{{errors.telefono}}</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" name="email" class="form-control"
                                    [(ngModel)]="createClienteData.email">
                                <div *ngIf="errors.email">
                                    <p style="color: red;font-size: 12px;">{{errors.email}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" (click)="closePopupCreate()">Cancelar</button>
                        <button type="button" class="btn btn-primary" (click)="createCliente()">Crear</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
        
</html>