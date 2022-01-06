<template>
<!-- component -->
<div class="flex justify-center bg-blue-300">
<form @submit.prevent="onSubmit"  id="alta" >
    <br><br>
    <div class="text-gray-700 text-base font-bold text-center text-xl mb-2">Alta de becario</div>
    <br><br>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-curp">
            CURP*
        </label>
        <input v-model="curp" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-curp" type="text" placeholder="CURP">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nombre">
            Nombre completo*
        </label>
        <input v-model="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="Nombre completo">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-fecha-nacimiento">
            Fecha de nacimiento*
        </label>
        <input v-model="fecha_nacimiento" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-fecha-nacimiento" type="date" placeholder="">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-sexo">
            Sexo*
        </label>
        <div class="relative">
            <select v-model="sexo" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-sexo" placeholder="">
                <option value="Mujer">Mujer</option>
                <option value="Hombre">Hombre</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-domicilio">
            Domicilio
        </label>
        <input v-model="domicilio" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-domicilio" type="text" placeholder="Domicilio">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-localidad">
            Localidad
        </label>
        <input v-model="localidad" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-localidad" type="text" placeholder="Localidad">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-municipio">
            Municipio
        </label>
        <input v-model="municipio" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-municipio" type="text" placeholder="Municipio">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-telefono">
            Teléfono
        </label>
        <input v-model="telefono" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-telefono" type="text" placeholder="Teléfono">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-correo">
            Correo
        </label>
        <input v-model="correo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-correo" type="text" placeholder="Correo">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-fecha">
            Fecha de ingreso
        </label>
        <input v-model="fecha_ingreso" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="date" placeholder="">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-representante1">
            Representante 1
        </label>
        <input v-model="representante1" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-representante1" type="text" placeholder="Representante 1">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-representante2">
            Representante 2
        </label>
        <input v-model="representante2" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-representante1" type="text" placeholder="Representante 2">
        </div>

        </div>
        <br>
        <p class="flex justify-center mt-6 px-4 py-2 text-sm text-gray-600 tracking-wide font-semibold font-sans">* Campos obligatorios.</p>
            <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Registrar</button>
            <button @click="cancelar" class="w-full mt-6 mb-3 bg-blue-400 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">Cancelar</button>
    </form>
    </div>
</template>

<script>
    export default {

        data() {
            return{
                showButtons: true,
                showConsulta: false,
                showSolicitud: false,

                nombre: '',
                fecha_nacimiento: '',
                curp: '',
                representante1: '',
                representante2: '',
                domicilio: '',
                localidad: '',
                municipio: '',
                telefono: '',
                correo: '',
                fecha_ingreso: '',
                estatus: 'ACTIVO',
                sexo: '',

            submitted: {
                nombre: '',
                fecha_nacimiento: '',
                curp: '',
                representante1: '',
                representante2: '',
                domicilio: '',
                localidad: '',
                municipio: '',
                telefono: '',
                correo: '',
                fechaIngreso: '',
                estatus: 'ACTIVO',
                sexo: '',
                }

            }
        },

        mounted() {

        },

        methods: {
            onSubmit: function(event) {
                if (this.nombre != '' && this.tipo_sangre != '' && this.fecha_nacimiento != '' ) {
                    this.submitted.nombre = this.nombre
                    this.submitted.fecha_nacimiento = this.fecha_nacimiento
                    this.submitted.tipo_sangre = this.tipo_sangre
                    this.guardar(this.submitted)
                    ///event.target.reset()
                } else {
                    alert("Proporcione todos los datos solicitados")
                }

            },
            cancelar(){
                this.$emit('cancelar')
            },
            guardar(registro){
                    let ruta = "agregarpaciente"
                    axios.post(ruta, {
                        nombre: registro.nombre,
                        fecha_nacimiento: registro.fecha_nacimiento,
                        tipo_sangre: registro.tipo_sangre,

                    }).then((response) => {
                        var respuesta = response.data
                        if(respuesta > 0){
                            alert("Paciente agregado(a) correctamente")
                            this.submitted.nombre = this.nombre = ''
                            this.submitted.fecha_nacimiento = this.fecha_nacimiento = ''
                            this.submitted.tipo_sangre = this.tipo_sangre = ''
                        }
                        else{
                         alert("Ocurrió un error al guardar la información")
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            }

        }
    }
</script>
