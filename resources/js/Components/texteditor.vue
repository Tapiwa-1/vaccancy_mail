<template>
  <editor-content :editor="editor" />
</template>

<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = useEditor({
  content: '<p>Iām running Tiptap with Vue.js. š</p>',
  extensions: [
    StarterKit,
  ],
})
</script>
