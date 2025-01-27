@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h2 class="card-title text-center">REGISTRAR NUEVO ALUMNO <hr></h2>
        <form class="forms-sample" method="post" action="{{ route('alumno.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Nombre y Apellido</label>
                    <div class="col-sm-12">
                      <input type="text" name="nameFullAlumno" class="form-control" required/>
                    </div>
                </div>
                 <!-- Campo de cédula con botón de verificación -->
                 <div class="row">
                        <div class="col-md-4">
                            <label class="col-sm-6 col-form-label">Cédula</label>
                            <div class="col-sm-12">
                                <input type="number" id="cedula_alumno" name="cedula_alumno" class="form-control" required />
                                <button type="button" id="verificar-cedula" class="btn btn-primary mt-2">Verificar Cédula</button>
                            </div>
                            <div id="resultado-cedula" class="alert d-none mt-2"></div>
                        </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Lugar de expedición de Documento</label>
                    <div class="col-sm-12">
                      <input type="text" name="lugar_exp_document" class="form-control" />
                    </div>
                </div>
              </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Referencia Familiar</label>
                    <div class="col-sm-12">
                      <input type="text" name="ref_family" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Celular de la referencia familiar</label>
                    <div class="col-sm-12">
                      <input type="number" name="phone_ref_family" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Talla del Uniforme</label>
                    <div class="col-sm-12">
                      <input type="number" name="talla_uniforme" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Correo del Alumno</label>
                    <div class="col-sm-12">
                      <input type="text" name="email_alumno" class="form-control" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Ciudad</label>
                    <div class="col-sm-12">
                      <input type="text" name="ciudad" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Teléfono</label>
                    <div class="col-sm-12">
                      <input type="number" name="phone_alumno" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Edad del Alumno</label>
                    <div class="col-sm-12">
                      <input type="number" name="edad_alumno" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Dirección</label>
                    <div class="col-sm-12">
                      <input type="text" name="addres" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Asignar Curso</label>
                    <select name="curso_id" class="form-control form-control-sm">
                        <option value="">Seleccione</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}"> {{ $curso->nombre_curso }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-4">
                    <label class="col-sm-12 col-form-label">Asignar Sede</label>
                    <select name="profesor_id" class="form-control form-control-sm">
                        <option value="">Seleccione</option>
                        @foreach ($profesores as $profe)
                            <option value="{{ $profe->id }}"> {{ $profe->nameFull }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Foto del Alumno</label>
                    <div class="col-sm-9">
                      <input type="file" name="foto_estudiante" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="col-sm-6 col-form-label">Observación</label>
                    <textarea name="observ" class="form-control" rows="4" cols="50"></textarea>
                </div>
            </div>
             
          
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mr-2 mb-3">Registrar Alumno</button>
                <a href="/"  class="btn btn-inverse-dark btn-fw mb-3">Cancelar</a>
            </div>
        </form>
        </div>
    </div>
</div>
</div>

<script>
    // Validar cédula ecuatoriana
    function validarCedulaEcuatoriana(cedula) {
        if (cedula.length !== 10) return false;

        // Extraer el dígito verificador
        const digitoVerificador = parseInt(cedula[9]);
        const coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
        let suma = 0;

        // Calcular la suma de los primeros 9 dígitos
        for (let i = 0; i < 9; i++) {
            let producto = parseInt(cedula[i]) * coeficientes[i];
            if (producto >= 10) producto -= 9;
            suma += producto;
        }

        // Obtener el módulo 10
        const modulo = suma % 10;
        const digitoCalculado = modulo === 0 ? 0 : 10 - modulo;

        return digitoCalculado === digitoVerificador;
    }

    // Manejar la verificación de cédula
    document.getElementById('verificar-cedula').addEventListener('click', function () {
        const cedula = document.querySelector('[name="cedula_alumno"]').value;
        const resultado = document.getElementById('resultado-cedula');

        if (validarCedulaEcuatoriana(cedula)) {
            resultado.classList.remove('d-none', 'alert-danger');
            resultado.classList.add('alert-success');
            resultado.textContent = 'Cédula válida.';
        } else {
            resultado.classList.remove('d-none', 'alert-success');
            resultado.classList.add('alert-danger');
            resultado.textContent = 'Cédula no válida.';
        }
    });
</script>



@endsection
