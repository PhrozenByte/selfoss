declare module '@siteparts/show-hide-effects' {
    export function fadeOut(
        element: HTMLElement,
        options?: {
            duration?: number;
            complete?: () => void;
        },
    ): void;
}
