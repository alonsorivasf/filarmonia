<template>
<!-- component -->
<div class="flex justify-center bg-blue-300">
<form @submit.prevent="onSubmit"  id="alta" >
    <br><br>
    <div class="text-gray-700 text-base font-bold text-center text-xl mb-2">Alta de instrumental</div>
    <br><br>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-descripcion">
            Descripción*
        </label>
        <input v-model="descripcion" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-descripcion" type="text" placeholder="Descripción">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-marca">
            Marca
        </label>
        <input v-model="marca" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-marca" type="text" placeholder="Marca">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-modelo">
            Modelo
        </label>
        <input v-model="modelo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-modelo" type="text" placeholder="Modelo">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-serie">
            No. Serie
        </label>
        <input v-model="serie" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-serie" type="text" placeholder="No. Serie">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-codigo">
            Código ID
        </label>
        <input v-model="codigo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-codigo" type="text" placeholder="Código ID">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-sede-origen">
            Sede de origen
        </label>
        <div class="relative">
            <select v-model="sedeOrigen" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-sede-origen" placeholder="">
                <option value="Donato Guerra">Donato Guerra</option>
                <option value="Valle de Bravo">Valle de Bravo</option>
                <option value="Otro">Otro</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-sede-ubicacion">
            Sede ubicación
        </label>
        <div class="relative">
            <select v-model="sedeUbicacion" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-sede-ubicacion" placeholder="">
                <option value="Donato Guerra">Donato Guerra</option>
                <option value="Valle de Bravo">Valle de Bravo</option>
                <option value="Otro">Otro</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-categoria">
            Categoría
        </label>
        <div class="relative">
            <select v-model="categoria" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-categoria" placeholder="">
                <option value="Alientos Madera">Alientos Madera</option>
                <option value="Alientos Metal">Alientos Metal</option>
                <option value="Percusión">Percusión</option>
                <option value="Cuerda">Cuerda</option>
                <option value="Electrónicos">Electrónicos</option>
                <option value="Otro">Otros</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-limite">
            Límite (de asignación)
        </label>
        <input v-model="limite" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-limite" type="text" placeholder="Límite (asignación)">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-notas">
            Notas
        </label>
        <input v-model="notas" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-notas" type="text" placeholder="Notas">
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

                descripcion: '',
                marca: '',
                modelo: '',
                serie: '',
                codigo: '',
                sedeOrigen: '',
                sedeUbicacion: '',
                notas: '',
                limite: '',
                categoria: '',

            submitted: {
                descripcion: '',
                marca: '',
                modelo: '',
                serie: '',
                codigo: '',
                sedeOrigen: '',
                sedeUbicacion: '',
                notas: '',
                limite: '',
                categoria: '',
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
