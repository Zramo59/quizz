interface LogoProps {
  size?: number;
}

/** Inline SVG logo: a stylised quiz/lightbulb mark, no external asset needed. */
export function Logo({ size = 96 }: LogoProps) {
  return (
    <svg
      width={size}
      height={size}
      viewBox="0 0 96 96"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      role="img"
      aria-label="Logo Culture Quiz"
    >
      <circle cx="48" cy="48" r="46" fill="url(#cq-gradient)" />
      <path
        d="M48 24c-9.4 0-17 7.2-17 16.1 0 6.2 3.6 11.6 9 14.3v6.1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.1c5.4-2.7 9-8.1 9-14.3C65 31.2 57.4 24 48 24Z"
        fill="#fff"
      />
      <rect x="41" y="66" width="14" height="6" rx="2" fill="#fff" />
      <text
        x="48"
        y="47"
        textAnchor="middle"
        fontSize="20"
        fontWeight="700"
        fill="#5B3DF6"
        fontFamily="system-ui, sans-serif"
      >
        ?
      </text>
      <defs>
        <linearGradient id="cq-gradient" x1="0" y1="0" x2="96" y2="96" gradientUnits="userSpaceOnUse">
          <stop offset="0" stopColor="#7C5CFC" />
          <stop offset="1" stopColor="#4A2FD6" />
        </linearGradient>
      </defs>
    </svg>
  );
}
