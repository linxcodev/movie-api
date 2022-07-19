<template>
  <div class="c-body">
    <main class="c-main">
      <div class="container-fluid">
        <div class="fade-in my-2">
          <div class="card">
            <div class="row">
              <div class="col-md-6">
                <h1>Kategori</h1>
              </div>

              <div class="col-md-6 text-right">
                <b-button v-b-modal.modal-kategori variant="primary" class="mr-5"
                  >Tambah</b-button
                >
              </div>
            </div>
          </div>

          <table class="table text-center">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Kategori</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="data in kategori" :key="data.kode">
                <td>{{ data.kode }}</td>
                <td>{{ data.nama_kategori }}</td>
              </tr>
            </tbody>
          </table>

          <b-modal id="modal-kategori" title="Tambah Kategori">
            <div class="form-group">
              <label>Kode</label>
              <input type="text" class="form-control" v-model="data.kode" />
            </div>

            <div class="form-group">
              <label>Nama Kategori</label>
              <input
                type="text"
                class="form-control"
                v-model="data.nama_kategori"
              />
            </div>

            <template v-slot:modal-footer="{ ok, cancel }">
              <b-button size="sm" variant="secondary" @click="cancel()">
                Batal
              </b-button>
              <b-button
                size="sm"
                variant="primary"
                :disabled="error"
                @click="tambah"
              >
                Tambah Kategori
              </b-button>
            </template>
          </b-modal>
          <!-- modal -->
        </div>
      </div>
    </main>
  </div>
</template>
<script>
import { mapActions, mapState } from "vuex";

export default {
  name: "Kategori",
  data() {
    return {
      data: {
        kode: "",
        nama_kategori: "",
      },
    };
  },
  computed: {
    ...mapState("kategori", ["kategori"]),
  },
  methods: {
    ...mapActions('kategori', ['tambahKategori']),

    async tambah() {
      if (this.error) {
        this.$swal({
          title: "Perhatikan Kode",
          text: "Pastikan kode tidak sama",
          icon: "error",
        });

        return;
      }
      try {
        await this.tambahKategori({ kategori: this.data });
        this.$bvToast.toast("Kategori berhasil ditambah", successToas());
        this.$bvModal.hide("modal-kategori");

        this.data.kode = "";
        this.data.nama_kategori = "";
      } catch (error) {
        this.$bvToast.toast(error.message, errorToas());
      }
    },
  },
};
</script>