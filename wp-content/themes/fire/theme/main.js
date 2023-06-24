import balanceText from 'balance-text';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

// https://alpinejs.dev/globals/alpine-data#registering-from-a-bundle
document.addEventListener('alpine:init', () => {
  balanceText();
  // stores

  // components
});

document.addEventListener('DOMContentLoaded', () => {
  window.Alpine = Alpine;
  // plugins
  Alpine.plugin(focus);
  Alpine.start();
});
