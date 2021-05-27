<template>
  <div class="InputImage">
    <div class="image-input-field">
      <input type="file" @change="onChange">
      <p>クリックでファイルを選択</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["value"],
  computed: {
    image: {
      set(value) {
        this.$emit("inputImage", value);
      },
      get() {
        return this.value;
      }
    }
  },
  methods: {
    
    onChange(event) {
      const files = event.target.files;
      if (files.length !== 1 || files[0].type.indexOf("image") !== 0) {
        return;
      }
      this.readImage(files[0]);
    },
    readImage(file) {
      let reader = new FileReader();
      reader.onload = this.loadImage;
      reader.readAsDataURL(file);
    },
    loadImage(e) {
      let image = new Image();
      image.src = e.target.result;
      this.image = image;
    }
  }
};
</script>
