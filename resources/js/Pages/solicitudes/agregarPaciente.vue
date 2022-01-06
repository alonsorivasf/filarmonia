<template>
<!-- component -->
<div class="flex justify-center">
<form @submit.prevent="onSubmit"  id="alta" >
    <br><br>
    <div class="text-gray-700 text-base font-bold text-center text-xl mb-2">Alta de paciente</div>
    <br><br>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            Nombre completo
        </label>
        <input v-model="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" placeholder="Nombre completo">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-fecha">
            Fecha de nacimiento
        </label>
        <input v-model="fecha_nacimiento" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="date" placeholder="">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Tipo de sangre
        </label>
        <div class="relative">
            <select v-model="tipo_sangre" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-tipo" placeholder="">
            <option value="A positivo">A positivo</option><option value="A negativo">A negativo</option>
            <option value="O positivo">O positivo</option><option value="O negativo">O negativo</option>
            <option value="B positivo">B positivo</option><option value="B negativo">B negativo</option>
            <option value="AB positivo">AB positivo</option><option value="AB negativo">AB negativo</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-fecha">
            Acciones
        </label>
        <button @click="cancelar" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
            Cancelar
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
            Guardar
        </button>
        </div>

        </div>
        <br>
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
                tipo_sangre: '',

            submitted: {
                nombre: '',
                fecha_nacimiento: '',
                tipo_sangre: '',
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
