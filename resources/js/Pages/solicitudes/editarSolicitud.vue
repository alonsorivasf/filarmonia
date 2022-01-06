<template>
<!-- component -->
<div class="flex justify-center">
<form @submit.prevent="onSubmit"  id="alta" >
    <br><br>
    <div class="text-gray-700 text-base font-bold text-center text-xl mb-2">Editar solicitud</div>
    <br><br>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-fecha">
            Fecha de solicitud
        </label>
        <input v-model="fecha" class="disable appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" disabled readonly>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            Nombre del paciente
        </label>
        <input v-model="nombre" class="disable appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-nombre" type="text" disabled readonly>
        </div>
    </div>
    <br>    <br>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            Cant. Donadores
        </label>
        <input v-model="cantidad_donadores" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" min="1" max="99" step="1"  placeholder="1">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Urgente
        </label>
        <div class="relative">
            <select v-model="urgente" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="NO">NO</option>
            <option value="SI">SI</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Tipo de sangre
        </label>
        <div class="relative">
            <select v-model="tipo_sangre" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-tipo" placeholder="">
            <option value="Todos">Todos</option>
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
        <button @click="cancelar" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Cancelar
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
        props: ['solicitud'],

        data() {
            return{
                showButtons: true,
                showConsulta: false,
                showSolicitud: false,

                id_solicitud: '',
                fecha: '',
                nombre: '',
                cantidad_donadores: '',
                urgente: '',
                tipo_sangre: '',
                estatus: '',

            submitted: {
                id_solicitud: '',
                cantidad_donadores: '',
                urgente: '',
                tipo_sangre: '',
            }

            }
        },

        mounted() {
            this.id_solicitud = this.solicitud.id_solicitud
            this.fecha = this.solicitud.fecha
            this.nombre = this.solicitud.nombre
            this.cantidad_donadores = this.solicitud.cantidad_donadores,
            this.urgente = this.solicitud.urgente
            this.tipo_sangre = this.solicitud.tipo_sangre
            this.estatus = this.solicitud.estatus

        },

        methods: {
            onSubmit: function(event) {
                this.submitted.id_solicitud = this.id_solicitud
                this.submitted.cantidad_donadores = this.cantidad_donadores
                this.submitted.urgente = this.urgente
                this.submitted.tipo_sangre = this.tipo_sangre
                this.guardar(this.submitted)
                ///event.target.reset()


            },
            cancelar(){
                this.$emit('cancelar')
            },
            guardar(registro){
                    let ruta = "editarsolicitud"
                    axios.post(ruta, {
                        id_solicitud: registro.id_solicitud,
                        cantidad_donadores: registro.cantidad_donadores,
                        urgente: registro.urgente,
                        tipo_sangre: registro.tipo_sangre,

                    }).then((response) => {
                        var respuesta = response.data
                        if(respuesta > 0){
                            alert("Solicitud actualizada correctamente")
                            this.cancelar();
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
